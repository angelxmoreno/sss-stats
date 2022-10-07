import path from 'path';
import fs from 'fs';
import {componentConfigs} from "./config/componentConfig";
import {render} from "template-file";
import Parcel from "@parcel/core";

const SRC_DIR = __dirname + path.sep;
const ROOT_DIR = path.resolve(SRC_DIR, '..') + path.sep;
const TMP_DIR = path.resolve(ROOT_DIR, 'tmp') + path.sep;
const WIDGETS_DIR = path.resolve(ROOT_DIR, 'widgets') + path.sep;

const ENTRY_TPL = `
import 'bootstrap/dist/css/bootstrap.min.css';
import React from 'react';
import ReactDOM from 'react-dom/client';
import {{ path }} from '{{ componentPath }}'

const selector = '.reactWidget-{{selector}}';
const ReactWidgets = document.querySelectorAll(selector);

ReactWidgets.forEach(Div => {
    const data = (Div as HTMLElement).dataset;
    ReactDOM.createRoot(Div).render(
        <React.StrictMode>
            <{{ path }} {...data}/>
        </React.StrictMode>
    );
});

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
// reportWebVitals(console.log);
`;

export default class WidgetBuilder {
    public static async build() {
        await this.clearDirs();
        await this.createEntryFiles();
        await this.buildBundles();
    }

    public static async refresh() {
        await this.buildBundles();
    }

    protected static async buildBundles() {
        const promises = componentConfigs.map(async ({name, path}) => {
            const entryFile = TMP_DIR + name + '.tsx'
            await console.log(`bundling "${entryFile}"`)
            const bundler = new Parcel({
                entries: entryFile,
                defaultConfig: '@parcel/config-default',
                mode: 'production',
                // targets: {
                //     default: {
                //         distDir: 'dist/' + name,
                //         // distEntry: name+'.js',
                //     },
                // },
                env: {
                    PUBLIC_URL: '',
                    NODE_ENV: 'production',
                },
            });

            try {
                let {bundleGraph, buildTime} = await bundler.run();
                let bundles = bundleGraph.getBundles();
                await console.log(`✨ ${name} ✨ Built ${bundles.length} bundles in ${buildTime}ms!`);
            } catch (err) {
                const {message, name} = err as Error
                const {diagnostics} = err as { diagnostics: any }
                console.error(`failed to bundle "${entryFile}"`, {
                    name,
                    message,
                    diagnostics
                });
            }
        })

        await Promise.all(promises)
    }

    protected static async createEntryFiles() {
        const promises = componentConfigs.map(async ({name, path}) => {
            const componentPath = `../src/components/${path}`;

            const entryFile = TMP_DIR + name + '.tsx';
            await console.log(`creating entry file ${entryFile}`);
            const entryContents = render(ENTRY_TPL, {
                selector: name,
                componentPath,
                path
            });
            await console.log(`saving entry file ${entryFile}`);
            await fs.promises.writeFile(entryFile, entryContents);
        })

        await Promise.all(promises)
    }

    protected static async clearDirs() {
        const dirs = [TMP_DIR, WIDGETS_DIR];

        const promises = dirs.map(async dir => {
            const exists = fs.existsSync(dir);
            if (exists) {
                await console.log(`"${dir} exists so deleting it"`);
                await fs.promises.rm(dir, {recursive: true});
            }

            await console.log(`"creating an empty ${dir}"`);
            await fs.promises.mkdir(dir);
        })

        await Promise.all(promises);
    }
}
