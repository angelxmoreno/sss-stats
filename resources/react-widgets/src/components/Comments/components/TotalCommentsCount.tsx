import React, {FC} from 'react';
import {observer} from 'mobx-react-lite';
import {useCommentsCtx} from "../store/CommentContext";
import NumberAbbreviator from "./NumberAbbreviator";

const TotalCommentsCount: FC = () => {
    const commentsCtx = useCommentsCtx();
    const count = commentsCtx.commentsCount
        ? <NumberAbbreviator number={commentsCtx.commentsCount}/>
        : 0;
    return (
        <p>Comment count: {count}</p>
    )
};

export default observer(TotalCommentsCount);
