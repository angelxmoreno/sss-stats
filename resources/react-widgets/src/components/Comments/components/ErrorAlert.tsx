import React, {FC} from 'react';
import {observer} from 'mobx-react-lite';
import {useCommentsCtx} from "../store/CommentContext";
import Alert from 'react-bootstrap/Alert';

const ErrorAlert: FC = () => {
    const commentsCtx = useCommentsCtx();
    return (
        <Alert variant={'danger'} transition show={!!commentsCtx.errorInstance}>
            {commentsCtx.errorInstance && commentsCtx.errorInstance.message}
        </Alert>
    )
};

export default observer(ErrorAlert);
