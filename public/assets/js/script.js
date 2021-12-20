/**
 * FONCTIONS
 */


// Forcer le telechargement d'un fichier

function downloadFile(url, filename) {
    function onStartedDownload(id) {
        console.log(`Started downloading: ${id}`);
    }

    function onFailed(error) {
        console.log(`Download failed: ${error}`);
    }

    var downloadUrl = url;

    var downloading = download({
        url: downloadUrl,
        filename: filename + '.png',
        conflictAction: 'uniquify'
    });

    downloading.then(onStartedDownload, onFailed);
}










/**
 * SCRIPTS
 */


/*
$(".download-link").click(function(event) {
    var blob = new Blob(
        [data], {
            type: "application/octet-stream"
        });
    var url = URL.createObjectURL(blob);

    var link = $(".download-link");
    link.attr("href", url);
    link.attr("download", "victor-hugo.txt");
});

*/