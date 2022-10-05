import React, {FC} from 'react';
import {CounterProvider} from "./CounterContext";
import CounterUi from "./CounterUi";

type Props = {};
const Counter: FC<Props> = ({}) => {
    return <CounterProvider><CounterUi/></CounterProvider>
};

export default Counter;
