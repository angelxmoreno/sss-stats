import {ComponentType} from "react";
import LikeButton from "../components/LikeButton";
import SampleButton from "../components/SampleButton";
import {RouteComponentProps} from "wouter";
import Comments from "../components/Comments";
import Counter from "../components/Counter";

type ComponentConfig = {
    name: string
    Component: ComponentType,
    path: string,
    params: Record<string, string>
    sampleProps?: Record<string, string | number>
}
type ComponentConfigs = ComponentConfig[];
type ComponentMap = Record<string, ComponentType>
export const componentConfigs: ComponentConfigs = [
    {
        name: 'counter',
        path: 'Counter',
        Component: Counter,
        params: {}
    },
    {
        name: 'likeButton',
        path: 'LikeButton',
        Component: LikeButton,
        params: {
            count: 'number'
        }
    },
    {
        name: 'sample',
        path: 'SampleButton',
        Component: SampleButton,
        params: {}
    },
    {
        name: 'comments',
        path: 'Comments',
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
