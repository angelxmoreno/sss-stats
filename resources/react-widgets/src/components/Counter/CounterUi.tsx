import React, {FC} from 'react';
import {useCounter} from "./CounterContext";
import ButtonGroup from "react-bootstrap/ButtonGroup";
import Button from "react-bootstrap/Button";
import {observer} from "mobx-react-lite";

const CounterUi: FC = () => {
    const counterStore = useCounter()
    return (
        <ButtonGroup size={'lg'} vertical>
            <Button variant={"success"} onClick={() => counterStore.increment()}>Increment</Button>
            <Button>{counterStore.count}</Button>
            <Button variant={"danger"} onClick={() => counterStore.decrement()}>Decrement</Button>
        </ButtonGroup>
    );
};

export default observer(CounterUi);
