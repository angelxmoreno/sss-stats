import React, {FC} from 'react';
import {observer} from 'mobx-react-lite';
import {useCommentsCtx} from "../store/CommentContext";
import Alert from 'react-bootstrap/Alert';

const IsFetching: FC = () => {
    const commentsCtx = useCommentsCtx();
    return (
        <Alert variant={'info'} transition show={commentsCtx.fetchingPending}>Fetching</Alert>
    )
};

export default observer(IsFetching);
