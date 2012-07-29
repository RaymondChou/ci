;CI = {};

CI.index_file = 'index.php';

CI._base_url = 'http://localhost/ci/';

CI.registry = {};

CI.base_url = function(path) {
    return this._base_url + path;
};

CI.site_url = function(path) {
    var prefix = this.index_file ? this.index_file + '/' : '';
    return this.base_url(prefix + path);
};

CI.redirect = function(path) {
	window.location.href = this.site_url(path);
};

CI.STATUS_SUCCESS = 1;
