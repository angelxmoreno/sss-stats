import React, {FC} from 'react';
import CommentsContainer from "./components/CommentsContainer";
import {CommentsCtxProvider} from "./store/CommentContext";
import {CommentsProps} from "./types";

const Comments: FC<CommentsProps> = (initValues) => {
    console.log('initValues', initValues)
    return (
        <CommentsCtxProvider initValues={initValues}>
            <CommentsContainer/>
        </CommentsCtxProvider>
    );
}

export default Comments;
