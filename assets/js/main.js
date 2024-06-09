// Função para Pegar Cookies
function getCookie(name) {
	var match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
	if (match) {
		return match[2];
	}
}

// Trocar tema do site
$(document).ready(function () {
	if (localStorage.getItem("theme")) {
		$("html").attr("data-bs-theme", localStorage.getItem("theme"));
		updateIcon();
	}

	$(".switch-theme").click(function () {
		if ($("html").attr("data-bs-theme") == "dark") {
			$("html").attr("data-bs-theme", "light");
			localStorage.setItem("theme", "light");
		} else {
			$("html").attr("data-bs-theme", "dark");
			localStorage.setItem("theme", "dark");
		}
		updateIcon();
	});

	function updateIcon() {
		if ($("html").attr("data-bs-theme") == "dark") {
			$(".switch-theme i").removeClass("fa-sun");
			$(".switch-theme i").addClass("fa-moon");
		} else {
			$(".switch-theme i").removeClass("fa-moon");
			$(".switch-theme i").addClass("fa-sun");
		}
	}
});

// Jquery Mask
$(document).ready(function () {
	$("#date").mask("00/00/0000");
	$("#time").mask("00:00:00");
	$("#date_time").mask("00/00/0000 00:00:00");
	$("#cep").mask("00000-000");
	$("#phone").mask("0000-0000");
	$("#celular_dd").mask("(00) 00000-0000");
	$("#phone_br").mask("(00) 0000-0000");
	$("#mixed").mask("AAA 000-S0S");
	$("#cpf").mask("000.000.000-00", { reverse: true });
	$("#cnpj").mask("00.000.000/0000-00", { reverse: true });
	$("#money").mask("000.000.000.000.000,00", { reverse: true });
	$("#money2").mask("#.##0,00", { reverse: true });
	$("#ip_address").mask("0ZZ.0ZZ.0ZZ.0ZZ", {
		translation: {
			Z: {
				pattern: /[0-9]/,
				optional: true,
			},
		},
	});
	$("#ip_address").mask("099.099.099.099");
	$("#percent").mask("##0,00%", { reverse: true });
	$("#clear-if-not-match").mask("00/00/0000", { clearIfNotMatch: true });
	$("#placeholder").mask("00/00/0000", { placeholder: "__/__/____" });
	$("#fallback").mask("00r00r0000", {
		translation: {
			r: {
				pattern: /[\/]/,
				fallback: "/",
			},
			placeholder: "__/__/____",
		},
	});
	$("#selectonfocus").mask("00/00/0000", { selectOnFocus: true });
});
