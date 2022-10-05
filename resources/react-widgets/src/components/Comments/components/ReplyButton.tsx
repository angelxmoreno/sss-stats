import React, {FC} from 'react';
import {observer} from 'mobx-react-lite';
import {useCommentsCtx} from "../store/CommentContext";
import Button from "react-bootstrap/Button";

type Props = {
    commentId: number
}
const ReplyButton: FC<Props> = ({commentId}) => {
    const commentsCtx = useCommentsCtx();
    const disabled = !commentsCtx.isLoggedIn;
    const active = commentsCtx.commentReplyId === commentId

    const handleClick = () => {
        commentsCtx.commentReplyId = active
            ? 0
            : commentId;
    }
    return <Button onClick={handleClick} active={active} disabled={disabled}>Reply</Button>
};

export default observer(ReplyButton);
