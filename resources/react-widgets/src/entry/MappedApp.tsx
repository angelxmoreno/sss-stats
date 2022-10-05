import React, {FC} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {componentMap} from "../config/componentConfig";

type Props = {
    data?: Record<string, string | number>
}
const MappedApp: FC<Props> = ({data}) => {
    const componentName = data?.name ? String(data.name) : 'sample';
    const Component = componentMap[componentName];
    return <Component {...data}/>
}

export default MappedApp;
