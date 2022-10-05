import React, {FC, useState} from "react";
import classNames from "classnames";
import Button from "react-bootstrap/Button";

type Props = {
    count?: number
}
const LikeButton: FC<Props> = ({count = 0}) => {
    const [isActive, setActive] = useState(false);
    const [countShow, setCountShow] = useState(Number(count));
    const btnVariant = classNames({
        'success': isActive,
        'outline-secondary': !isActive,
    })

    const btnText = classNames({
        'Liked': isActive,
        'Click To Like': !isActive,
    });
    const handleClick = () => {
        if (isActive) {
            setActive(false);
            setCountShow(count);
        } else {
            setActive(true);
            setCountShow(Number(count) + 1);
        }
    }
    return (
        <Button
            variant={btnVariant}
            size={'lg'}
            onClick={handleClick}
        >
            {countShow} {btnText}
        </Button>
    );
}

export default LikeButton;
