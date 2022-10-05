import axios from "axios";
import {CommentDao} from "../daos";

const getTotalCommentsCount = async (videoId: number): Promise<number> => {
    const {data} = await axios.get<{ count: number }>('/you-tube-comments/count/' + videoId);
    return data.count;
}

const getComments = async (videoId: number): Promise<CommentDao[]> => {
    const {data} = await axios.get<{ items: CommentDao[] }>('/you-tube-comments/index/' + videoId);
    return data.items;
}


const CommentsApi = {getTotalCommentsCount, getComments};

export default CommentsApi;
