import React, {FC} from 'react';
import Button from "react-bootstrap/Button";
import {BsFillHandThumbsDownFill, BsFillHandThumbsUpFill} from "react-icons/bs";
import NumberAbbreviator from "./NumberAbbreviator";

type Props = {
    count?: number
    isActive: boolean
    type: 'up' | 'down'
    className?: string
    handleClick: () => void
};

const LikeButton: FC<Props> = ({count, type, className, isActive, handleClick}) => {
    const Icon = type === 'up'
        ? BsFillHandThumbsUpFill
        : BsFillHandThumbsDownFill;

    const variant = isActive
        ? 'primary'
        : 'outline-dark';

    return (
        <Button variant={variant} className={className} active={isActive} onClick={() => handleClick()}>
            <Icon style={{verticalAlign: 'baseline'}}/>
            {count && <NumberAbbreviator number={count}/>}
        </Button>
    );
};

export default LikeButton;
