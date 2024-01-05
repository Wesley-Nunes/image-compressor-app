![php](https://img.shields.io/badge/php-fff?style=for-the-badge&logo=php&logoColor=4f5b93 "php")
![Javascript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black "Javascript")
![HTML](https://img.shields.io/badge/HTML-e34c26?style=for-the-badge&logo=html5&logoColor=black "HTML")
![CSS](https://img.shields.io/badge/CSS-264de4?style=for-the-badge&logo=css3&logoColor=black "CSS")

# Image Compressor

Image Compressor is a tool designed to efficiently compress images.

## Table of Contents

- [Motivation](#motivation)
- [Requirements](#requirements)
- [How to use](#how-to-use)
- [Project structure](#project-structure)
- [Design](#design)
- [Lighthouse Report](#lighthouse-report)
- [Preview](#preview)
- [Attributions](#attributions)
- [License](#license)
- [Author](#author)

## <a name="motivation"></a>Motivation

I developed this application to apply the principles I've learned while studying PHP. The goal is to create a user-friendly solution for image compression.

## <a name="requirements"></a>Requirements

- PHP ^8.3.0
- Node ^20.6.0

## <a name="how-to-use"></a>How to use

Follow these steps to compress an image:

1. Click on the **"Upload Image"** button.
2. Select the image you want to compress (supports jpg, png, WebP; maximum file size: 10MB).
3. _Wait for the compression process to complete._
4. Choose the location to save the compressed image.

## <a name="project-structure"></a>Project Structure

```
/project-root
    index.php            # Main entry point for the application
    src/
        styles/          # CSS files for styling
        media/           # Images, icons, videos
        client/          # Client-side code (JavaScript)
        server/          # Server-side code (PHP)
            temp/        # Temporally server folders and files
        template/        # HTML/PHP views
```

### Useful commands:

```
npm i                   # install the packages
npm run build           # build the project on folder htdocs
npm run server          # starts the PHP built-in in server
```

## <a name="design"></a>Design

I create the design using the Material 3 design system.  
The design is available here: [Image Compressor](https://www.figma.com/file/LVjL0KETlSy8WoqwpKzPIt/Image-Compressor?type=design&node-id=0%3A1&mode=design&t=w8Y4N3hv68IHBA1H-1).

## <a name="#lighthouse-report"></a>Lighthouse Report

![loghthouse-report](https://github.com/Wesley-Nunes/image-compressor-app/assets/43190808/4520301e-c771-460e-a498-6798779d629d)

## <a name="preview"></a>Preview

The project is available on [Image Compressor](https://image-compressor.rf.gd/?i=1)

## <a name="attributions"></a>Attributions

All media used in this app are free for usage, and the sources are credited below:

- [Octopus](https://www.freepik.com/free-vector/cute-octopus-courier-holding-package-box-cartoon-vector-icon-illustration-animal-business-icon-concept-isolated-premium-vector-flat-cartoon-style_20340771.htm#page=2&query=cartoon%20octopus&position=20&from_view=search&track=ais&uuid=72e3dcf6-b9b6-4a30-888c-f3533a87547f) Image by catalyststuff on Freepik;
- [Fav icon](https://www.freepik.com/free-vector/sticker-design-with-empty-box-closed-isolated_18184239.htm#query=package&position=4&from_view=search&track=sph&uuid=f4570466-bcf0-4125-a932-3cf513adbe11) Image by brgfx on Freepik.

## <a name="license"></a>License

The code is under the [MIT License](./LICENSE).

## <a name="author"></a>Author

Developed by @Wesley-Nunes  
[![Connect](https://img.shields.io/badge/-Connect-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/dev-wesley-nunes/)](https://www.linkedin.com/in/dev-wesley-nunes/)
