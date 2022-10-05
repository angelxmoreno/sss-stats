import React, {FC} from 'react';
import {useCommentsCtx} from "../store/CommentContext";
import {observer} from "mobx-react-lite";
import IsFetching from "./IsFetching";
import ErrorAlert from "./ErrorAlert";
import TotalCommentsCount from "./TotalCommentsCount";
import CommentsList from "./CommentsList";

const CommentsContainer: FC = () => {
    const commentsCtx = useCommentsCtx()
    return (
        <>
            <ErrorAlert/>
            <IsFetching/>
            <h2>Comments {commentsCtx.videoId}</h2>
            <TotalCommentsCount/>
            <CommentsList/>
        </>
    );
};

export default observer(CommentsContainer);
