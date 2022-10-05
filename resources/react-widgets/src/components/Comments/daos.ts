export interface UserDao {
    id: number;
    name?: string;
    picture_url?: string;
}

export interface AuthorDao {
    id: number;
    name: string;
    image_url?: string;
    channel_uid: string;
    created: Date;
    modified: Date;
}

export interface CommentDao {
    id: number;
    uid: string;
    you_tube_comment_author_id: number;
    parent_id?: any;
    you_tube_video_id: number;
    can_reply: boolean;
    is_public: boolean;
    total_reply_count: number;
    can_rate: boolean;
    like_count: number;
    published_at: Date;
    text_display: string;
    text_original: string;
    updated_at: Date;
    created: Date;
    modified: Date;
    child_you_tube_comments: any[];
    you_tube_comment_author: AuthorDao;
}
