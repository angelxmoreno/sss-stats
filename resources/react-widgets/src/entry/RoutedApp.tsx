import React, {FC} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Route, Switch} from "wouter";
import {componentsArray} from "../config/componentConfig";
import ComponentList from "../components/ComponentList";

const RoutedApp: FC = () => {

    const urlSearchParams = new URLSearchParams(window.location.search);
    const queryParams = Object.fromEntries(urlSearchParams.entries());
    return (
        <Switch>
            <>
                {
                    componentsArray.map(({name, Component}) => (
                        <Route key={name} path={`/${name}`}>
                            {params => <Component {...queryParams} params={params}/>}
                        </Route>
                    ))
                }
            </>
            <Route><ComponentList/></Route>
        </Switch>
    )
}

export default RoutedApp;
