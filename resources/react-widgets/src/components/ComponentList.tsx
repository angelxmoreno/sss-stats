import React, {FC} from 'react';
import {componentConfigs} from "../config/componentConfig";
import {Container} from "react-bootstrap";

type Props = {};
const ComponentList: FC<Props> = ({}) => {
    return (
        <Container fluid>
            {componentConfigs.map(({name, Component, params, sampleProps}) => (
                <div key={name}>
                    <h4>{name}</h4>
                    <div>
                        <strong>Params: </strong>
                        <pre className={'text-muted'}>{JSON.stringify(params, null, 2)}</pre>
                    </div>
                    <Component {...sampleProps}/>
                    <hr/>
                </div>
            ))}
        </Container>
    );
};

export default ComponentList;
