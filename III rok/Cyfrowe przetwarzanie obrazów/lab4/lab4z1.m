[L1,map]=(imread('C:\Users\Piotrek\Downloads\obrazy_lab4\7.bmp'));
figure; imshow(L1,map); %wyswietlenie obrazu
LL=ind2gray(L1,map); %zamiana na odcien szarosci
figure; imshow(LL); %wyswietlenie obrazu w odcieniach szarosci
figure; imshow(LL>50.5); %wyswietl tylko te ktorych wartosc jest wieksza od 0.5 (czarno biale)