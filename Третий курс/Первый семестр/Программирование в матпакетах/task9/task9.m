function task9()
    syms x;
    y(x) = 3 - sqrt(x) - 0.5 * log(x);

    disp('# 1. Область опред');
    disp('Область определения функции: ');
    disp('x > 0');

    disp('# 2. Односторонние приделы');
    disp('Предел к бесконечности');
    disp(limit(y, x, inf));

    disp('Предел справа к нулю');
    disp(limit(y, x, 0, 'right'));

    disp('# 3. пересечение с осями');
    disp('Ox');
    disp(vpasolve(y == 0, x));
    disp('Oy');
    disp(y(0));

    disp('# 4. Четность');
    disp('Функция ни четная ни нечетная');

    disp('# 5. Периодическая?');
    disp('Нет');

    disp('# 6. Экстремумы');
    dy(x) = diff(y, x);
    extr = solve(dy == 0, x);

    sgn_p = sign(dy(extr + rand()));
    sgn_m = sign(dy(extr - rand()));

    fprintf('     %0d      %d      %0d     \n', sgn_m, extr, sgn_p);

    if sgn_m < sgn_p
        disp('Локальный минимум: ');
    else
        disp('Локальный максимум: ');
    end

    disp(double(y(extr)));

    disp('# 7. Выпуклость')

    ddy = diff(dy, x);
    extr = solve(ddy == 0, x);

    sgn_p = sign(ddy(extr + rand()));
    sgn_m = sign(ddy(extr - rand()));
    fprintf('     %0d      %d      %0d     \n', sgn_m, extr, sgn_p);
    
    fprintf('Функция вогнута на всей области определения\n')

    disp('# 8. Горизонт и вертикальные асимптоты');
    disp('Нет горизонтальных придел, потому что предел к +inf это -inf и -inf это undefined');

    disp('y = k*x + b');
    k = limit(y / x, x, inf);
    b = limit(y - k * x, x, inf);
    fprintf('y = %d * x + %d\n', k, b);

    disp('f(x) -> inf, при x -> 0');

    disp('# 9. График');
    a = input('Левый край интервала для постройки\n');
    b = input('Правый край интервала для постройки\n');
    task9_1(a, b)

    disp('# 10. ряд Тейлора');

    disp('Taylor expansion at x = 1');
    pretty(taylor(y, x, 1));
end
