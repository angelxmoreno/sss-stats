import path from 'path';
import fs from 'fs';

const SRC_DIR = __dirname + path.sep;
const ROOT_DIR = path.resolve(SRC_DIR, '..') + path.sep;
const TMP_DIR = path.resolve(ROOT_DIR, 'tmp') + path.sep;
const WIDGETS_DIR = path.resolve(ROOT_DIR, 'widgets') + path.sep;

class WidgetBuilder {
    public static async build() {
        console.log('SRC_DIR', SRC_DIR);
        console.log('ROOT_DIR', ROOT_DIR);
        console.log('TMP_DIR', TMP_DIR);
    }

    protected static async clearDirs() {
        await fs.promises.rm(TMP_DIR);
        await fs.promises.rm(WIDGETS_DIR);
    }
}

WidgetBuilder.build().catch(console.error);
