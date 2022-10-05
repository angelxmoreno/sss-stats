import React, {FC} from 'react';
import {Col, Container, Image, Row} from "react-bootstrap";
import Form from 'react-bootstrap/Form';
import Button from "react-bootstrap/Button";
import {observer} from "mobx-react-lite";
import {useCommentsCtx} from "../store/CommentContext";


type Props = {
    commentId: number
}

const NewCommentForm: FC<Props> = ({commentId}) => {
    const commentsCtx = useCommentsCtx()
    const handleCancel = () => {
        commentsCtx.commentReplyId = 0;
    }
    const handleSave = () => {
    }
    return commentsCtx.commentReplyId === commentId
        ? (
            <Container fluid className={'mt-2'}>
                <Row>
                    <Col md={1}>
                        {commentsCtx.user?.picture_url &&
                        <Image fluid roundedCircle loading={'lazy'} src={commentsCtx.user.picture_url}/>}
                    </Col>
                    <Col>
                        <Form.Control type={'textarea'}/>
                        <div className={'mt-2'}>
                            <Button className={'me-2'} variant={'secondary'} onClick={handleCancel}>Cancel</Button>
                            <Button className={'me-2'} onClick={handleSave}>Comment</Button>
                        </div>
                    </Col>
                </Row>
            </Container>
        )
        : null;
};

export default observer(NewCommentForm);
