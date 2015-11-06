clear; clc
[OBRAZ map]=imread('C:\Users\Piotrek\Downloads\MT24.BMP'); %wczytuje obraz do macierzy obraz
disp('wymiary obrazu'); [Lw, Lk, N]=size(OBRAZ)
%obraz i jego 3 macierze skladowe:
figure
subplot(2,2,1); imshow(OBRAZ, map); title('OBRAZ');
%RED - czerwona
clear D; D(Lw,Lk,3)=uint8(0); D(:,:,1)=OBRAZ(:,:,1);
subplot(2,2,2); imshow(D); title('Skladowa RED');
%GREEN - zielona
clear D; D(Lw,Lk,3)=uint8(0); D(:,:,2)=OBRAZ(:,:,2);
subplot(2,2,3); imshow(D); title('Skladowa GREEN');
%BLUE - niebieska
clear D; D(Lw,Lk,3)=uint8(0); D(:,:,3)=OBRAZ(:,:,3);
subplot(2,2,4); imshow(D); title('Skladowa BLUE');