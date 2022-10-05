import React, {FC, useEffect} from 'react';
import {observer} from 'mobx-react-lite';
import {useCommentsCtx} from "../store/CommentContext";
import CommentItem from "./CommentItem";

const CommentsList: FC = () => {
    const commentsCtx = useCommentsCtx();
    useEffect(() => {
        commentsCtx.fetchComments()
    }, [commentsCtx])
    return (
        <>
            {commentsCtx.commentsArray.map(({id}) => (
                <CommentItem key={id} commentId={id}/>
            ))}
        </>
    )
};

export default observer(CommentsList);
