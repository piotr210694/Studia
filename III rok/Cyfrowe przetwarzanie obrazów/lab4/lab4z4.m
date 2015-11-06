I = imread('C:\Users\Piotrek\Downloads\obrazy_lab4\krajobraz1.tif');
I2 = imcrop(I);
imshow(I2);
title('Cropped Image');