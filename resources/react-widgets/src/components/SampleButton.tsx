import React, {useState} from "react";
import classNames from "classnames";
import Button from "react-bootstrap/Button";

const SampleButton = () => {
    const [isActive, setActive] = useState(false);
    const btnVariant = classNames({
        'outline-primary': isActive,
        'primary': !isActive,
    })
    const btnText = classNames({
        'I am activado': isActive,
        'I no activado': !isActive,
    });
    return (
        <Button
            variant={btnVariant}
            size={'lg'}
            onClick={() => setActive(!isActive)}
        >
            {btnText}
        </Button>
    );
}

export default SampleButton;
