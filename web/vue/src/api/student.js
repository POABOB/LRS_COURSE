import request from "../utils/request"

export function getStuents() {
    return request({
        url: '/api/students/list',
        method: 'get'
    })
}

export function insertStuent(data) {
    return request({
        url: '/api/students/insert',
        method: 'post',
        data
    })
}

export function insertXLSXStuent(data) {
    return request({
        url: '/api/students/insert/xlsx',
        method: 'post',
        data
    })
}

export function updateStuent(data) {
    return request({
        url: '/api/students/update',
        method: 'post',
        data
    })
}

export function deleteStuent(data) {
    return request({
        url: '/api/students/delete',
        method: 'delete',
        data
    })
}