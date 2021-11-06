function show(show) {
    if (show == "profile") {
        document.getElementById('profile').style.display = 'block';

        document.getElementById('settings').style.display = 'none';
        document.getElementById('jobs').style.display = 'none';
        document.getElementById('applies').style.display = 'none';
        document.getElementById('tickrts').style.display = 'none';
    }
    else if (show == "settings") {
        document.getElementById('settings').style.display = 'block';

        document.getElementById('profile').style.display = 'none';
        document.getElementById('jobs').style.display = 'none';
        document.getElementById('applies').style.display = 'none';
        document.getElementById('tickrts').style.display = 'none';
    }
    else if (show == "jobs") {
        document.getElementById('jobs').style.display = 'block';

        document.getElementById('settings').style.display = 'none';
        document.getElementById('profile').style.display = 'none';
        document.getElementById('applies').style.display = 'none';
        document.getElementById('tickrts').style.display = 'none';
    }
    else if (show = "applies") {
        document.getElementById('applies').style.display = 'block';

        document.getElementById('settings').style.display = 'none';
        document.getElementById('jobs').style.display = 'none';
        document.getElementById('profile').style.display = 'none';
        document.getElementById('tickrts').style.display = 'none';
    }
    else if (show == "tickets") {
        document.getElementById('tickets').style.display = 'block';

        document.getElementById('settings').style.display = 'none';
        document.getElementById('jobs').style.display = 'none';
        document.getElementById('applies').style.display = 'none';
        document.getElementById('profile').style.display = 'none';
    }

    return false;
}