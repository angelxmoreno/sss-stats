import {ComponentType} from "react";
import {RouteComponentProps} from "wouter";
import Comments from "../components/Comments/Comments";

type ComponentConfig = {
    name: string
    Component: ComponentType,
    params: Record<string, string>
    sampleProps?: Record<string, string | number>
}
type ComponentConfigs = ComponentConfig[];
type ComponentMap = Record<string, ComponentType>
export const componentConfigs: ComponentConfigs = [

    {
        name: 'comments',
        Component: Comments,
        params: {
            videoId: 'number',
            user: 'AuthorDao',
        },
        sampleProps: {
            videoId: 62,
        }
    },
];

export const componentMap: ComponentMap = {}

componentConfigs.forEach(({name, Component}) => {
    componentMap[name] = Component;
});


export const componentsArray = Object.entries(componentMap).map(([name, component]) => ({
    name,
    Component: component as ComponentType<RouteComponentProps<{}>>
}));
