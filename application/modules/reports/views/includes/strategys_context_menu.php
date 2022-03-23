
<menu class="menu">
  <li class="menu-item">
    <a  href="<?=base_url()?>visualize/<?=$strategy->id?>">
    <button type="button" class="menu-btn"> <i class="fa fa-chart-pie"></i> <span class="menu-text">Visualize</span> </button>
    </a>
  </li>
  <li class="menu-separator"></li>
  <li class="menu-item">
    <a  href="<?=base_url()?>report/pdf/<?=$strategy->id?>">
       <button type="button" class="menu-btn"> <i class="fa fa-file"></i> <span class="menu-text">Export PDF</span> </button>
      </a>
  </li>
</menu>

