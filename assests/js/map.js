var map = document.getElementById("map");
var cpc_folding = new OriDomi(map, {
  vPanels: 6,
  hPanels: 2,
  speed: 1200,
  ripple: 2,
  perspective: 1000,
  maxAngle: 89,
  shadingIntensity: 0.8,
  shading: "soft",
});
cpc_folding.accordion(85).accordion(15, () => {
  map.style = "transform:rotate(-2deg)";
});
