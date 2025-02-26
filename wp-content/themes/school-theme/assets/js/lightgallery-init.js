// document.addEventListener("DOMContentLoaded", function () {
//     const galleryElements = document.querySelectorAll(".wp-block-gallery");

//     galleryElements.forEach(gallery => {
//         lightGallery(gallery, {
//             selector: "a",
//             plugins: [lgZoom, lgThumbnail],
//             speed: 500
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function () {

    const galleryElements = document.querySelectorAll(".wp-block-gallery");

    galleryElements.forEach(gallery => {

        gallery.querySelectorAll('.wp-block-image img').forEach(img => {
            if (!img.parentElement.matches('a')) {
                let link = document.createElement('a');
                link.href = img.src; 
                img.parentNode.insertBefore(link, img);
                link.appendChild(img);
            }
        });

        lightGallery(gallery, {
            selector: "a",
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
        });
    });
});
