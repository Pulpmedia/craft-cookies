import '../styles/main.scss';
import Cookie from 'js-cookie';
import $ from 'jquery';

function ready(fn) {
    if (document.attachEvent ? document.readyState === 'complete' : document.readyState !== 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

const track = (hide = false) => {
    Cookie.set('user-accepted-cookies', true, { expires: 30 });
    window.initPulpAnalytics();
    if (hide) {
        $('.pulp-analytics-container').hide();
    }
};
const init = () => {
    const allowed = Cookie.get('user-accepted-cookies');
    if (!allowed) {
        $('.pulp-analytics-confirm-button').click(() => track(true));
    } else {
        track();
    }
};

ready(init);
