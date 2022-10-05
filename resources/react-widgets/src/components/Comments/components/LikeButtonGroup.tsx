import React, {FC, useState} from 'react';
import LikeButton from "./LikeButton";

type Props = {
    likeCount: number
    userLiked: boolean
};

const userLikedToActiveState = (userLiked: boolean | undefined = undefined): number => {
    return userLiked === true
        ? 1
        : userLiked === false
            ? -1
            : 0;
}
const LikeButtonGroup: FC<Props> = ({likeCount: initCount, userLiked}) => {
    const [activeState, setActiveState] = useState<number>(userLikedToActiveState(userLiked))
    const [count, setCount] = useState(initCount);


    const handleClick = (newState: number) => {
        if (activeState === 1 && newState === 1) {
            setCount(initCount);
            setActiveState(0);
        } else if (activeState === 0 && newState === 1) {
            setCount(initCount + 1);
            setActiveState(1);
        } else if (activeState === -1 && newState === 1) {
            setCount(initCount + 1);
            setActiveState(1);
        } else if (activeState === 1 && newState === -1) {
            setCount(initCount - 1);
            setActiveState(-1);
        } else if (activeState === 0 && newState === -1) {
            setCount(initCount - 1);
            setActiveState(-1);
        } else if (activeState === -1 && newState === -1) {
            setCount(initCount + 1);
            setActiveState(0);
        }
    }

    return (
        <div className={'d-flex'}>
            <LikeButton
                className={'me-2'}
                count={count}
                isActive={activeState === 1}
                type={'up'}
                handleClick={() => handleClick(1)}/>

            <LikeButton
                className={'me-2'}
                isActive={activeState === -1}
                type={'down'}
                handleClick={() => handleClick(-1)}/>
        </div>
    );
};

export default LikeButtonGroup;
