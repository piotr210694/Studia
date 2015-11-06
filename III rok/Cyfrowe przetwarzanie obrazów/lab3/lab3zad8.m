[x,map]=imread('trees.tif'); %czytaj plik 'trees.tif'
I=ind2gray(x,map); %konwersuj na obraz monochromatyczny
imshow(x,map); %wyswietl obraz indeksowany x
figure, imshow(I); %wyswietl obraz monochromatyczny

[x,map]=imread('trees.tif'); %czytaj plik 'trees.tif'
I = gray2ind(x,map);
imshow(x,map);
figure, imshow(I);