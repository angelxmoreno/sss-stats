import React, {FC} from 'react';
import {Image} from "react-bootstrap";
import LikeButtonGroup from "./LikeButtonGroup";
import NewCommentForm from "./NewCommentForm";
import {observer} from "mobx-react-lite";
import {useCommentsCtx} from "../store/CommentContext";
import ReplyButton from "./ReplyButton";

type Props = {
    commentId: number
};
const CommentItem: FC<Props> = ({commentId}) => {
    const commentsCtx = useCommentsCtx()
    const commentDao = commentsCtx.commentsCollection.get(commentId);
    if (!commentDao) return null;
    const published = new Date(commentDao.published_at);


    return (
        <div className={'d-flex m-2'}>
            <div className={'me-2'}>
                {commentDao.you_tube_comment_author.image_url &&
                <Image roundedCircle loading={'lazy'} src={commentDao.you_tube_comment_author.image_url}/>}
            </div>
            <div>
                <small>{commentDao.you_tube_comment_author.name} - {published.toLocaleDateString()}</small>
                <p className={'lead'}>
                    {commentDao.text_original}
                </p>
                <div className={'d-flex'}>
                    <LikeButtonGroup likeCount={commentDao.like_count} userLiked={(commentDao.like_count % 3) === 1}/>
                    <ReplyButton commentId={commentId}/>
                </div>
                <NewCommentForm commentId={commentId}/>
            </div>
        </div>
    );
};

export default observer(CommentItem);
