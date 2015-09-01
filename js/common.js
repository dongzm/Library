function request(t) {
	var n = location.href,
		r = n.substring(n.indexOf("?") + 1, n.length).split("&"),
		e = {};
	for (i = 0; j = r[i]; i++) e[j.substring(0, j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=") + 1, j.length);
	var o = e[t.toLowerCase()];
	return "undefined" == typeof o ? "" : o
}

function ltrim(t) {
	return t.replace(/(^\s*)/, "")
}

function rtrim(t) {
	return t.replace(/(\s*$)/, "")
}

function trim(t) {
	return rtrim(ltrim(t))
}

function checkNull(t) {
	return null == t ? "" : t
}

function checkTrimAndNull(t) {
	return null == t ? "" : t.replace(/\ /g, "")
}

function checkDropValue(t) {
	return null == t || "" == t ? "" : t
}

function getUrlValue(t) {
	var n = window.location.href,
		r = "",
		i = n.indexOf(t + "=");
	if (-1 != i) {
		var e = n.substr(i + t.length + 1),
			o = e.indexOf("&"); - 1 != o && (e = e.substr(0, o)), r = e
	}
	return r
}

function getUrlAll() {
	var t = location.href,
		n = t.substring(t.indexOf("?") + 1);
	return n
}

function subStr(value) {
	str = value;
	if (value != null && value.length > 100) {
		str = value.substr(0, 100) + "...";
	}
	return str;
}