import API from "../APIService"

export const getProfile = (username) => {
    return API.get(`/user/profile/${username}`)
}