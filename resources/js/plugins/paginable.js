/**
 * @param params => Object = {
 *     per_page
 *     page
 *     search
 *     sortBy
 *     sortDir
 *     filters
 * }
 * @returns {String}
 */
String.prototype.paginableUrl = function(params){

    let per_page = 10;
    let page = null;
    let search = null;
    let sortBy = null;
    let sortDir = null;
    let filters = null;
    if (params.per_page) per_page = params.per_page;
    if (params.page) page = params.page;
    if (params.search) search = params.search;
    if (params.sortBy) sortBy = params.sortBy;
    if (params.sortDir) sortDir = params.sortDir;
    if (params.filters) filters = params.filters;

    let url = this;

    url += '?per_page='+per_page;

    if (page) url += '&page='+page;
    if (search) url += '&search='+search;
    if (sortDir) {
        if (sortDir.toLowerCase() === 'asc') {
            if (sortBy) url += '&sortBy='+sortBy;
        } else {
            if (sortBy) url += '&sortByDesc='+sortBy;
        }
    }
    if (filters){
        if (filters.date_col && filters.date_from ||
            filters.date_col && filters.date_to ||
            filters.date_col && filters.date_from && filters.date_to ) url += '&date_col='+filters.date_col;

        if (filters.date_from) url += '&date_from='+filters.date_from.replace(/\/|\-/gi,'_');
        if (filters.date_to) url += '&date_to='+filters.date_to.replace(/\/|\-/gi,'_');
        if (filters.custom) {
            for (let index in filters.custom){
                if (filters.custom[index] !== null){
                    url += '&'+index+'='+filters.custom[index];
                }
            }

        }
    }
    return url;
};
