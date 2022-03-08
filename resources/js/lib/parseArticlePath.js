const parseArticlePath = (id) => {
    return {
        view: `/view/${id}`,
        edit: `/edit/${id}`,
    };
};

export default parseArticlePath;
