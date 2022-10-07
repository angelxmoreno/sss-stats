import React, {FC} from 'react';
import {observer} from "mobx-react-lite";
import IsFetching from "./IsFetching";
import ErrorAlert from "./ErrorAlert";
import TotalCommentsCount from "./TotalCommentsCount";
import CommentsList from "./CommentsList";

const CommentsContainer: FC = () => {
    return (
        <>
            <ErrorAlert/>
            <IsFetching/>
            <TotalCommentsCount/>
            <CommentsList/>
        </>
    );
};

export default observer(CommentsContainer);
