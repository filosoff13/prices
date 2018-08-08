graf_1 � graf_2 - �������, �� ������� ����� ������� ������ ��� ���������� ��������(�� ������� ����� � ������� ����� �� �������).
�. �. ����������� ����� ������� �� ���� �������, �� ������ ������� �� �������� � �� ��� ������:
- � ������� �� ���� ������� �������(��� ���� ������ ���. �����). � ������ ���������� ��� ����(01.08; 02.08;...08.08).
- ����� � ����� ���������, ��������� �� ������ ��������� ������� ��� � ������, ������� ��� ���� $query = "SELECT * FROM (SELECT * FROM `variants` WHERE '$date' BETWEEN `period_from` AND `period_to`  ORDER BY (`period_to` - `period_from`) ) AS mt GROUP BY `title` � ���������� ������ �������� � ���� �� ������(�� ������ � �����  ��� �� ����������, ������� ����� ����� �������������� ������).
- �� �� ������ � ��� ������� �������� �������.
- � ������� ������� pChart ������ �������:

  /* ���������� ������ */
  require_once "pChart/pData.class";
  require_once "pChart/pChart.class";
  $DataSet = new pData(); // ������ ������ pData
  $DataSet->AddPoint(array(0, 1, 4, 9, 16, 25, 36, 49, 64, 81, 100), "Serie1"); // ��������� ������ ������� 1
  $DataSet->AddPoint(array(0, 1, 8, 27, 64, 125, 216, 343, 512, 729, 1000), "Serie2"); // ��������� ������ ������� 2
  $DataSet->AddAllSeries(); // �������� ��� ������ ��� ����������
  $Test = new pChart(700, 230); // ������ ����������� ���������
  $Test->setFontProperties("Fonts/tahoma.ttf", 8); // ��������� ������
  $Test->setGraphArea(50, 30, 585, 200); // ��������� ������� �������
  $Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240); // �������� ��������� ���������������
  $Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230); // ������ ������ ����������� ���������
  $Test->drawGraphArea(255, 255, 255, true); // ������ ����������� ���������
  $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 150, 150, 150, true, 0, 2); // ������ ��� � ������
  $Test->drawGrid(4, true, 230, 230, 230, 50); // ������ �����
  $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription()); // ��������� ����� ������� �������
  $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(), 3, 2, 255, 255, 255); // ������ �����
  $Test->drawTitle(50, 22, "MyRusakov.ru", 50, 50, 50, 585); // ������� ��������� �������
  $Test->Stroke(); // ������� ������ � ���� ��������;