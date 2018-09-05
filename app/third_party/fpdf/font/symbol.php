<?php

$type = 'Core';
$name = 'Symbol';
$up   = -100;
$ut   = 50;
$cw   = array(
    chr(0)   => 250, chr(1)   => 250, chr(2)   => 250, chr(3)   => 250, chr(4)   => 250, chr(5)   => 250, chr(6)   => 250, chr(7)   => 250, chr(8)   => 250, chr(9)   => 250, chr(10)  => 250, chr(11)  => 250,
    chr(12)  => 250, chr(13)  => 250, chr(14)  => 250, chr(15)  => 250, chr(16)  => 250, chr(17)  => 250, chr(18)  => 250, chr(19)  => 250, chr(20)  => 250, chr(21)  => 250,
    chr(22)  => 250, chr(23)  => 250, chr(24)  => 250, chr(25)  => 250, chr(26)  => 250, chr(27)  => 250, chr(28)  => 250, chr(29)  => 250, chr(30)  => 250, chr(31)  => 250, ' '      => 250, '!'      => 333,
    '"'      => 713, '#'      => 500, '$'      => 549, '%'      => 833, '&'      => 778, '\''     => 439, '('      => 333, ')'      => 333, '*'      => 500, '+'      => 549,
    ','      => 250, '-'      => 549, '.'      => 250, '/'      => 278, '0'      => 500, '1'      => 500, '2'      => 500, '3'      => 500, '4'      => 500, '5'      => 500, '6'      => 500, '7'      => 500,
    '8'      => 500, '9'      => 500, ':'      => 278, ';'      => 278, '<'      => 549, '='      => 549, '>'      => 549, '?'      => 444, '@'      => 549, 'A'      => 722,
    'B'      => 667, 'C'      => 722, 'D'      => 612, 'E'      => 611, 'F'      => 763, 'G'      => 603, 'H'      => 722, 'I'      => 333, 'J'      => 631, 'K'      => 722, 'L'      => 686, 'M'      => 889,
    'N'      => 722, 'O'      => 722, 'P'      => 768, 'Q'      => 741, 'R'      => 556, 'S'      => 592, 'T'      => 611, 'U'      => 690, 'V'      => 439, 'W'      => 768,
    'X'      => 645, 'Y'      => 795, 'Z'      => 611, '['      => 333, '\\'     => 863, ']'      => 333, '^'      => 658, '_'      => 500, '`'      => 500, 'a'      => 631, 'b'      => 549, 'c'      => 549,
    'd'      => 494, 'e'      => 439, 'f'      => 521, 'g'      => 411, 'h'      => 603, 'i'      => 329, 'j'      => 603, 'k'      => 549, 'l'      => 549, 'm'      => 576,
    'n'      => 521, 'o'      => 549, 'p'      => 549, 'q'      => 521, 'r'      => 549, 's'      => 603, 't'      => 439, 'u'      => 576, 'v'      => 713, 'w'      => 686, 'x'      => 493, 'y'      => 686,
    'z'      => 494, '{'      => 480, '|'      => 200, '}'      => 480, '~'      => 549, chr(127) => 0, chr(128) => 0, chr(129) => 0, chr(130) => 0, chr(131) => 0,
    chr(132) => 0, chr(133) => 0, chr(134) => 0, chr(135) => 0, chr(136) => 0, chr(137) => 0, chr(138) => 0, chr(139) => 0, chr(140) => 0, chr(141) => 0, chr(142) => 0, chr(143) => 0, chr(144) => 0, chr(145) => 0,
    chr(146) => 0, chr(147) => 0, chr(148) => 0, chr(149) => 0, chr(150) => 0, chr(151) => 0, chr(152) => 0, chr(153) => 0,
    chr(154) => 0, chr(155) => 0, chr(156) => 0, chr(157) => 0, chr(158) => 0, chr(159) => 0, chr(160) => 750, chr(161) => 620, chr(162) => 247, chr(163) => 549, chr(164) => 167, chr(165) => 713, chr(166) => 500,
    chr(167) => 753, chr(168) => 753, chr(169) => 753, chr(170) => 753, chr(171) => 1042, chr(172) => 987, chr(173) => 603, chr(174) => 987, chr(175) => 603,
    chr(176) => 400, chr(177) => 549, chr(178) => 411, chr(179) => 549, chr(180) => 549, chr(181) => 713, chr(182) => 494, chr(183) => 460, chr(184) => 549, chr(185) => 549, chr(186) => 549, chr(187) => 549,
    chr(188) => 1000, chr(189) => 603, chr(190) => 1000, chr(191) => 658, chr(192) => 823, chr(193) => 686, chr(194) => 795, chr(195) => 987, chr(196) => 768, chr(197) => 768,
    chr(198) => 823, chr(199) => 768, chr(200) => 768, chr(201) => 713, chr(202) => 713, chr(203) => 713, chr(204) => 713, chr(205) => 713, chr(206) => 713, chr(207) => 713, chr(208) => 768, chr(209) => 713,
    chr(210) => 790, chr(211) => 790, chr(212) => 890, chr(213) => 823, chr(214) => 549, chr(215) => 250, chr(216) => 713, chr(217) => 603, chr(218) => 603, chr(219) => 1042,
    chr(220) => 987, chr(221) => 603, chr(222) => 987, chr(223) => 603, chr(224) => 494, chr(225) => 329, chr(226) => 790, chr(227) => 790, chr(228) => 786, chr(229) => 713, chr(230) => 384, chr(231) => 384,
    chr(232) => 384, chr(233) => 384, chr(234) => 384, chr(235) => 384, chr(236) => 494, chr(237) => 494, chr(238) => 494, chr(239) => 494, chr(240) => 0, chr(241) => 329,
    chr(242) => 274, chr(243) => 686, chr(244) => 686, chr(245) => 686, chr(246) => 384, chr(247) => 384, chr(248) => 384, chr(249) => 384, chr(250) => 384, chr(251) => 384, chr(252) => 494, chr(253) => 494,
    chr(254) => 494, chr(255) => 0);
$uv   = array(32  => 160, 33  => 33, 34  => 8704, 35  => 35, 36  => 8707, 37  => array(37, 2), 39  => 8715, 40  => array(40, 2), 42  => 8727, 43  => array(43, 2), 45  => 8722, 46  => array(46, 18), 64  => 8773,
    65  => array(
        913, 2), 67  => 935, 68  => array(916, 2), 70  => 934, 71  => 915, 72  => 919, 73  => 921, 74  => 977, 75  => array(922, 4), 79  => array(927, 2), 81  => 920, 82  => 929, 83  => array(931, 3),
    86  => 962, 87  => 937,
    88  => 926, 89  => 936, 90  => 918, 91  => 91, 92  => 8756, 93  => 93, 94  => 8869, 95  => 95, 96  => 63717, 97  => array(945, 2), 99  => 967, 100 => array(948, 2), 102 => 966, 103 => 947, 104 => 951,
    105 => 953,
    106 => 981, 107 => array(954, 4), 111 => array(959, 2), 113 => 952, 114 => 961, 115 => array(963, 3), 118 => 982, 119 => 969, 120 => 958, 121 => 968, 122 => 950, 123 => array(123, 3), 126 => 8764,
    160 => 8364, 161 => 978, 162 => 8242, 163 => 8804, 164 => 8725, 165 => 8734, 166 => 402, 167 => 9827, 168 => 9830, 169 => 9829, 170 => 9824, 171 => 8596, 172 => array(8592, 4), 176 => array(176, 2),
    178 => 8243, 179 => 8805, 180 => 215, 181 => 8733, 182 => 8706, 183 => 8226, 184 => 247, 185 => array(8800, 2), 187 => 8776, 188 => 8230, 189 => array(63718, 2), 191 => 8629, 192 => 8501, 193 => 8465,
    194 => 8476, 195 => 8472, 196 => 8855, 197 => 8853, 198 => 8709, 199 => array(8745, 2), 201 => 8835, 202 => 8839, 203 => 8836, 204 => 8834, 205 => 8838, 206 => array(8712, 2), 208 => 8736, 209 => 8711,
    210 => 63194, 211 => 63193, 212 => 63195, 213 => 8719, 214 => 8730, 215 => 8901, 216 => 172, 217 => array(8743, 2), 219 => 8660, 220 => array(8656, 4), 224 => 9674, 225 => 9001, 226 => array(63720,
        3), 229 => 8721, 230 => array(63723, 10), 241 => 9002, 242 => 8747, 243 => 8992, 244 => 63733, 245 => 8993, 246 => array(63734, 9));
?>
