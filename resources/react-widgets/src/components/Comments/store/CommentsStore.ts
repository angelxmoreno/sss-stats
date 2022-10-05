import {CommentDao, UserDao} from "../daos";
import {CommentsProps} from "../types";
import {makeAutoObservable} from "mobx";
import CommentsApi from "../api/api";
import {NestedError} from "../../../errors/NestedError";

export class CommentsStore {
    errorInstance: NestedError | undefined = undefined;
    user: UserDao | undefined = undefined;
    videoId: number;
    commentsCollection = new Map<number, CommentDao>()
    commentReplyId: number = 0;
    fetchingPending = false;
    commentsCount!: number;

    constructor({videoId, user}: CommentsProps) {
        if (user) {
            this.user = typeof user === "string" ? JSON.parse(user) : user;
        }
        this.videoId = Number(videoId);
        makeAutoObservable(this);
        this.fetchTotalCommentsCount();
    }

    get isLoggedIn(): boolean {
        return !!this.user;
    }

    get commentsArray(): CommentDao[] {
        const comments: CommentDao[] = [];
        this.commentsCollection.forEach(comment => comments.push(comment));
        return comments;
    }

    set activeReply(commentId: number) {
        this.commentReplyId = commentId;
    }

    setError(error: Error, msg: string | undefined = undefined) {
        this.errorInstance = new NestedError(msg ?? error.message, error);
    }

    * fetchTotalCommentsCount() {
        this.fetchingPending = true;
        try {
            this.commentsCount = (yield CommentsApi.getTotalCommentsCount(this.videoId)) as number;
        } catch (e) {
            this.setError(e as Error, 'Unable to fetch comments count')
        } finally {
            this.fetchingPending = false;
        }
    }

    * fetchComments() {
        this.fetchingPending = true;
        try {
            const comments = (yield CommentsApi.getComments(this.videoId)) as CommentDao[];
            comments.forEach(comment => {
                this.commentsCollection.set(comment.id, comment);
            });
        } catch (e) {
            this.setError(e as Error, 'Unable to fetch comments')
        } finally {
            this.fetchingPending = false;
        }
    }
}
