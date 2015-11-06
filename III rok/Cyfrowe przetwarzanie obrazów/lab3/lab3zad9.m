[x,map]=imread('trees.tif'); 
BW=im2bw(x,map,0.2); %konwersuj na obraz monochromatyczny
imshow(x,map); %wyswietl obraz indeksowany x
figure, imshow(BW); %wyswiel obraz monochromatyczny