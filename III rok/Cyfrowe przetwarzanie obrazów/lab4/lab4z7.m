%proste operacje arytmetyczne na obrazach
GR=imread('C:\Users\Piotrek\Downloads\obrazy_lab4\GRACE_K.BMP');
disp('Wymiary obrazu:'); [Lw,Lk]=size(GR);
GR1=double(GR);
figure;
%1) Obraz, 2)Obraz rozjasniony o 40
subplot(2,2,1); imshow(GR); title('Obraz GR');
subplot(2,2,2); imshow(uint8(GR1+40)); title('Obraz GR+40');
%3) i 4) Histogramy obrazow:
subplot(2,2,3); imhist(GR); title('Histogram obrazu GR');
subplot(2,2,4); imhist(uint8(GR1+40)); title('Histogram obrazu GR+40');
pause %czeka na ENTER
%----------------------------------------------------------------------
%1) obraz, 2) obraz przyciemniony o 40
subplot(2,2,1); imshow(GR); title('Obraz GR');
subplot(2,2,2); imshow(uint8(GR1-40)); title('Obraz GR-40');
%3) i 4) histogramy obrazow:
subplot(2,2,3); imhist(GR); title('Histogram obrazu GR');
subplot(2,2,4); imhist(uint8(GR1-40)); title('Histogram obrazu GR-40');
pause
%-----------------------------------
srednia = mean(GR(:));
B=uint8(GR1+0.6*(GR1-srednia));
%1)obraz, 2)obraz B o wiekszym kontrascie:
subplot(2,2,1); imshow(GR); title('Obraz GR');
subplot(2,2,2); imshow(B); title('B = GR+0.6*(GR-srednia)');
%3) i 4) histogramy obrazow:
subplot(2,2,3); imhist(GR); title('Histogram obrazu GR');
subplot(2,2,4); imhist(B); title('Histogram obrazu B');

