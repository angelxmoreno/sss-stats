import {renderFile} from 'template-file';
import fs from 'fs';
import Parcel from "@parcel/core";

const components = [
    'LikeButton',
    'SampleButton',
    'Comments/Comments',
    'Counter/Counter',
];


const main = async (name: string, selector: string, componentPath: string) => {
    const entryFile = 'tmp/' + name + '.tsx'
    const entryContents = await renderFile('src/singleWidget.tpl', {
        selector,
        componentPath
    });
    await fs.promises.writeFile(entryFile, entryContents);

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
            SELECTOR: selector,
            COMPONENT_PATH: componentPath,
        }
    });

    try {
        let {bundleGraph, buildTime} = await bundler.run();
        let bundles = bundleGraph.getBundles();
        console.log(`✨${name}✨ Built ${bundles.length} bundles in ${buildTime}ms!`);
    } catch (err) {
        const {message, name} = err as Error
        const {diagnostics} = err as { diagnostics: any }
        console.error('name', name);
        console.error('message', message);
        console.error('diagnostics', diagnostics);
    }
}


components.forEach(component => {
    const safeName = component.split('/')[0];
    const name = safeName.charAt(0).toLowerCase() + safeName.slice(1)
    const selector = '.' + name;
    const componentPath = `../src/components/${component}`;
    main(name, selector, componentPath);
});
