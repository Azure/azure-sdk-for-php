function uninstallPkg(pkg) {
    if (!confirm('Do you really want to uninstall "'+pkg+'"?'))
        return false;
    return true;
}
function installPkg(pkg) {
    if (!confirm('Please be patient while downloading "'+pkg+'".'))
        return false;
    return true;
}
