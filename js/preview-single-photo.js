document.addEventListener('DOMContentLoaded', function () {
    const previewThumbnail = document.getElementById('preview-thumbnail');
    const nextLink = document.getElementById('next-link');
    const prevLink = document.getElementById('prev-link');

    if (nextLink) {
        const nextThumbnail = nextLink.getAttribute('data-image');
        nextLink.addEventListener('mouseover', function () {
            previewThumbnail.setAttribute('src', nextThumbnail);
            previewThumbnail.setAttribute('data-original-thumbnail', nextThumbnail); // Update original thumbnail
        });
    }

    if (prevLink) {
        const prevThumbnail = prevLink.getAttribute('data-image');
        prevLink.addEventListener('mouseover', function () {
            previewThumbnail.setAttribute('src', prevThumbnail);
            previewThumbnail.setAttribute('data-original-thumbnail', prevThumbnail); // Update original thumbnail
        });
    }
});