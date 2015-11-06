function y = silnia(n)
if(n<=1)
    y=1;
else
    y=n*silnia(n-1);
end
end

% function s=silnia(n)
% s=0;
% if(n<1)
%     return
% else
%     s=1;
%     for i=2:n; s=s*i; end
% end