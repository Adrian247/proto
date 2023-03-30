/**
 * Mapped user to host format
 * @param user
 * @returns {{userName, uuid, email}}
 */
export const userToHost = (user) => {
    // Contract format in host
    const {
        uuid,
        name,
        email,
        created_at,
    } = user;
    // Format contract
    return {
        uuid,
        name,
        email,
        createdAt: dateToLocaDate(created_at)
    }
}

const dateToLocaDate = (dateToFormat) => {
    let dateFormat = new Date(dateToFormat)
    return dateFormat.toLocaleDateString()
}
